// Функция добавления, редактирование и удаления ингредиентов и шагов приготовления

function crudFormAdmin(input, collection, ul, type) {

    collection.push(input.value);

    input.value = '';

    ul.innerHTML = ``;

    collection.forEach( item => {

        if (item != '') {
            ul.innerHTML += `
            <li class="mt-3">
                <div class="row align-items-center ${type}">
                    <span>${item}</span>
                    <div class="btn btn-warning ml-2 edit_btn" onclick="deleteFromList(this, 'edit')">Редактировать</div>
                    <div class="btn btn-danger ml-2 delete_btn" onclick="deleteFromList(this)">Удалить</div>
                </div>
            </li>
        `;
        }



    } )



    let finishCollection = collection.map(item => item + '&');

    if (type == 'ingredients') {
        ingredientInpCollection.value = finishCollection;
    }
    else {
        processInpCollection.value = finishCollection;
    }

    console.log(ingredientList);
    console.log(processList);

}

function deleteFromList(item, option = '') {
    let parentDiv = item.parentNode;

    let ingredient = '';
    let process = '';

    if (parentDiv.classList.contains('ingredients')) {
        ingredient = parentDiv.querySelector('span').textContent;
        ingredientsCollection = ingredientsCollection.filter( item => item != ingredient );
        ingredientInpCollection.value = ingredientsCollection.map(item => item + '&');


        if (option) ingredientInp.value = ingredient;

    } else {
        process = parentDiv.querySelector('span').textContent;
        processCollection = processCollection.filter( item => item != process );
        processInpCollection.value = processCollection.map(item => item + '&');


        if (option) processInp.value = process;
    }

    (parentDiv.parentNode.parentNode).removeChild(parentDiv.parentNode);

}


// Поля ингредиентов
let ingredientInp = document.querySelector('#ingredients_inp');
let ingredientBtn = document.querySelector('#ingredients_btn');
let ingredientList = document.querySelector('#ingredients_list');
let ingredientInpCollection = document.querySelector('#ingredients_collection');
let ingredientsCollection = [];

// Поля шагов приготовления
let processInp = document.querySelector('#process_inp');
let processBtn = document.querySelector('#process_btn');
let processList = document.querySelector('#process_list');
let processInpCollection = document.querySelector('#process_collection');
let processCollection = [];



if (ingredientInpCollection.value) ingredientsCollection = (ingredientInpCollection.value).split('&,');

ingredientBtn.addEventListener('click', (e) => {
    e.preventDefault();

    crudFormAdmin(ingredientInp, ingredientsCollection, ingredientList, 'ingredients');

    console.log(ingredientsCollection);
});



if (processInpCollection.value) processCollection = (processInpCollection.value).split('&,');

processBtn.addEventListener('click', (e) => {
    e.preventDefault();

    crudFormAdmin(processInp, processCollection, processList, 'process');

    console.log(processCollection);
});




