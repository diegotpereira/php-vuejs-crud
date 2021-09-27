<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP| MySQL | Vue.js | Axios</title>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Gestão de Contatos</h1>
    <div id="app">
        <table border="1" width='100%' style="border-collapse: collapse;">
           <tr>
               <th>Nome</th>
               <th>Email</th>
               <th>Nacionalidade</th>
               <th>Cidade</th>
               <th>Cargo</th>
           </tr>

           <tr v-for="contato in contatos">
               <td>{{ contato.nome }}</td>
               <td>{{ contato.email }}</td>
               <td>{{ contato.nacionalidade }}</td>
               <td>{{ contato.cidade }}</td>
               <td>{{ contato.cargo }}</td>
           </tr>
        </table>
</br>
     <form>
         <label>Nome</label>
         <input type="text" name="nome" v-model="nome">
</br>
         <label>Email</label>
         <input type="email" name="email" v-model="email">
</br>
         <label>Nacionalidade</label>
         <input type="text" name="nacionalidade" v-model="nacionalidade">
</br>
         <label>Cidade</label>
         <input type="text" name="cidade" v-model="cidade">
</br>
         <label>Cargo</label>
         <input type="text" name="cargo" v-model="cargo">
</br>
        <input type="button" @click="criarContato()" value="Salvar">
     </form>
    </div>

    <script src="js/scriptVue.js"></script>
</body>
</html>