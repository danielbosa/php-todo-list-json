<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="./js/script.js" type="module"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>
    <link rel="stylesheet" href="./css/style.css" />
    <title>To do list</title>
</head>

<body>
    <div id="app">
        <header class="bg-light p-4 d-flex justify-content-between">
            <!-- logo da prendere -->
            <img src="./img/Myspace-logo.png" class="img-fluid" alt="">
            <select class="" name="done" id="done" v-model="done">
                <option value="true">Fatto</option>
                <option value="false">Da fare</option>
                <option value=""></option>
            </select>
        </header>
        <main class="container bg-light my-4">
            <h1>Lista cose da portare al mare</h1>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between" v-for="(item, index) in filteredTodo" :key="item.id">
                <span class="pointer" :class="{'text-decoration-line-through' : item.done}" @click="toggleDone(item.id)">
                    {{item.text}}
                </span>
                <span class="pointer" @click="">
                    <i class="fa-solid fa-circle-xmark" @click="removeItem(item.id)"></i>
                </span>
                </li>
            </ul>

            <div>
                <h2>Inserisci oggetto</h2>
                <div class="mb-3">
                    <!-- <label for="todotext" class="form-label">Inserici task2</label> -->
                    <input type="text" name="todo" class="form-control" id="todotext" v-model="newTodo.text" @keyup.enter="addItem">
                    <button type="button" class="btn btn-primary my-3" @click="addItem">Aggiungi</button>
                </div>
            </div>
        </main>
    </div>

</body>

</html>