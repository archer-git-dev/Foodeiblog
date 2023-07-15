<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\RecipeTag;
use Illuminate\Http\Request;

class RecipeParserController extends Controller
{
    protected $allData = [];

    public $category_id = 1;
    public $tags_ids = [1, 3, 5];

//    public $category_id = 2;
//    public $tags_ids = [3, 5];
//
//    public $category_id = 3;
//    public $tags_ids = [4, 8, 9, 10, 11];
//
//    public $category_id = 4;
//    public $tags_ids = [6, 8, 9];
//
//    public $category_id = 5;
//    public $tags_ids = [4, 10, 11];

    public function collectData()
    {

        try {

            $url = 'https://mirpovara.ru/catalog/goryachie-blyuda/';
//            $url = 'https://mirpovara.ru/catalog/salaty/';
//            $url = 'https://mirpovara.ru/catalog/deserty/';
//            $url = 'https://mirpovara.ru/catalog/vypechka/';
//            $url = 'https://mirpovara.ru/catalog/napitki/';

            $document = $this->getHtml($url);

            $items = $document->find('.short .title a');

            foreach ($items as $item) {

                $link = $item->attr('href');

                $this->collectSingleData('https://mirpovara.ru'.$link);

            }
            
            $this->insertToTable();

        } catch (Throwable $e) {
            echo "Error caught: " . $e->getMessage();
        }


    }

    public function getHtml($url) {
        $client = new \GuzzleHttp\Client();
        $resp = $client->get($url);
        $html = $resp->getBody()->getContents();

        $document = new \DiDom\Document();
        $document->loadHtml($html);

        return $document;
    }


    public function collectSingleData($link)
    {

        try {

            $document = $this->getHtml($link);

            $title = str_replace("\r\n", "", trim($document->first('h1')->text()));

            $subtitle = str_replace("\r\n", "", trim($document->first('.ns.description')->text()));

            $ingredients = $document->find('ul.ingredients li');
            $mainIngredients = '';

            foreach ($ingredients as $ingredient) {
                $mainIngredients .= str_replace("\r\n", "", trim($ingredient->first('.ingredient span.value')->text())) . ' - ' . str_replace("\r\n", "", trim($ingredient->first('.ingredient div.ing_r.ns.right')->text())) . '&,';
            }

            $steps = $document->find('p.step.ns.instruction');
            $mainProcess = '';

            foreach ($steps as $step) {

                $str_arr = mb_str_split(str_replace("\r\n", "", trim($step->text().'&,')));
                $new_str = '';

                for ($i = 0; $i < count($str_arr); $i++) {
                    if ( is_numeric($str_arr[$i])) continue;
                    $new_str = implode(array_slice($str_arr, $i));
                    break;
                }

                $mainProcess .= $new_str;

            }

            $image_url = 'https://mirpovara.ru'.str_replace("\r\n", "", trim($document->first('.image_full img')->attr('src')));
            $image_tmp = explode('/', $image_url);
            $image_tmp = array_pop($image_tmp);
            $image_name = 'recipe_images/' . $image_tmp;

            $slug = explode('.', $image_tmp)[0];


            $this->allData[] = [
                'title' => $title,
                'subtitle' => $subtitle,
                'ingredients' => $mainIngredients,
                'process' => $mainProcess,
                'image' => $image_name,
                'slug' => $slug,
                'category_id' => $this->category_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => NULL,
            ];



        } catch (Throwable $e) {
            echo "Error caught: " . $e->getMessage();
        }

    }

    public function insertToTable() {
        foreach ($this->allData as $data) {

            $recipe = Recipe::create($data);

            foreach ($this->tags_ids as $tag_id) {

                $recipeTagsData = [
                    'recipe_id' => $recipe->id,
                    'tag_id' => $tag_id
                ];

                RecipeTag::create($recipeTagsData);

            }

        }
    }
}
