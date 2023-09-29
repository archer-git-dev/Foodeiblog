// Функция добавления, редактирование и удаления ингредиентов и шагов приготовления

function crudFormAdmin(input, collection, ul, type) {

    if (editIndex !== false) {
        console.log(editIndex);
        collection[editIndex] = input.value;
    }else {
        collection.push(input.value);
    }

    input.value = '';

    ul.innerHTML = ``;

    collection.forEach((item, index) => {

        if (item != '') {
            ul.innerHTML += `
            <li class="mt-3">
                <div id="${type}_actions" class="${type}" data-index="${index}">
                    <span>${item}</span>
                    <div class="btn btn-warning ml-2 edit_btn" onclick="deleteFromList(this, 'edit')" id="edit_btn">Редактировать</div>
                    <div class="btn btn-danger ml-2 delete_btn" onclick="deleteFromList(this)" id="delete_btn">Удалить</div>
                </div>
            </li>
        `;
        }


    })


    let finishCollection = collection.map(item => item + '&');

    if (type == 'ingredients') {
        ingredientInpCollection.value = finishCollection;
    } else {
        processInpCollection.value = finishCollection;
    }

    editIndex = false;

}

function deleteFromList(item, option = '') {

    document.querySelectorAll('#edit_btn').forEach(item => item.style.display = 'none')
    document.querySelectorAll('#delete_btn').forEach(item => item.style.display = 'none')


    let parentDiv = item.parentNode;

    let ingredient = '';
    let process = '';

    if (parentDiv.classList.contains('ingredients')) {

        ingredient = parentDiv.querySelector('span').textContent;


        if (option) {
            ingredientInp.value = ingredient;
            editIndex = parentDiv.getAttribute('data-index');
        }else {

            ingredientsCollection = ingredientsCollection.filter(item => item != ingredient);
            ingredientInpCollection.value = ingredientsCollection.map(item => item + '&');

            (parentDiv.parentNode.parentNode).removeChild(parentDiv.parentNode);
        }


    } else {

        process = parentDiv.querySelector('span').textContent;


        processCollection = processCollection.filter(item => item != process);
        processInpCollection.value = processCollection.map(item => item + '&');


        if (option) {
            processInp.value = process;
            editIndex = parentDiv.getAttribute('data-index');
        }

    }



}


let editIndex = false;

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

    if (ingredientInp.value !== '') {
        document.querySelectorAll('#edit_btn').forEach(item => item.style.display = 'block')
        document.querySelectorAll('#delete_btn').forEach(item => item.style.display = 'block')
    }


    crudFormAdmin(ingredientInp, ingredientsCollection, ingredientList, 'ingredients');

});


if (processInpCollection.value) processCollection = (processInpCollection.value).split('&,');

processBtn.addEventListener('click', (e) => {
    e.preventDefault();

    if (processInp.value !== '') {
        document.querySelectorAll('#edit_btn').forEach(item => item.style.display = 'block')
        document.querySelectorAll('#delete_btn').forEach(item => item.style.display = 'block')
    }

    crudFormAdmin(processInp, processCollection, processList, 'process');

});




