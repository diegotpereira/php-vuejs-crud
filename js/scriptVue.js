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
    },
});