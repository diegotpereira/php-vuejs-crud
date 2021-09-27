var app = new Vue({
    el: '#app',
    data: {
        nome: '',
        email: '',
        nacionalidade: '',
        cidade: '',
        cargo: '',
        contatos: []
    },
    mounted: function() {
        console.log('Olá Usuário da Aplicação..!')
        this.buscarContatos()
    },
    methods: {
        buscarContatos: function() {
            axios.get('api/contatos.php')
                .then(function(response) {
                    console.log(response.data);
                    app.contatos = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        criarContato: function() {
            console.log("Adicionar Contato");

            let formData = new FormData();
            console.log("nome:", this.nome)
            formData.append('nome', this.nome)
            formData.append('email', this.email)
            formData.append('nacionalidade', this.nacionalidade)
            formData.append('cidade', this.cidade)
            formData.append('cargo', this.cargo)

            var contato = {};
            formData.forEach(function(value, key) {
                contato[key] = value;
            });
            axios({
                    method: 'POST',
                    url: 'api/contatos.php',
                    data: formData,
                    config: { headers: { 'Content-Type': 'multipart/form-data' } }
                })
                .then(function(response) {
                    console.log(response);
                    app.contatos.push(contato)
                    app.resetarFormulario();
                })
                .catch(function(response) {
                    console.log(response)
                });
        },
        resetarFormulario: function() {
            this.nome = '';
            this.email = '';
            this.nacionalidade = '';
            this.cidade = '';
            this.cargo = '';
        }
    },
});