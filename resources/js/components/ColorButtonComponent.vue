<template>
    <div class="container">
        <a class="text-dark" @click="changeColor"><i class="fas fa-palette"></i></a>
    </div>
</template>

<script>
    export default {        
        props: [
            'item_color', 'home'
        ],

        mounted() {
            console.log('Component mounted.')
        },

        data: function() {
            return {
                status: this.item_color
            }
        },

        methods: {
            changeColor : function () {
                var colors = [
                    ['bg-primary', ''],
                    ['bg-secondary', ''],
                    ['bg-success', ''],
                    ['bg-danger', ''],
                    ['bg-warning', 'text-dark'],
                    ['bg-info', ''],
                    ['bg-light', 'text-dark'],
                    ['bg-dark', '']
                ];

                var i = 0;
                for (i; i < colors.length; i++){
                    if (colors[i][0] == this.item_color) {
                        i = (i+1) % 8;
                        break;
                    }
                }
                
                axios({
                    method: 'post',
                    url: '/home/' + this.home,
                    data: {
                        item_color: colors[i][0],
                        text_color: colors[i][1]
                    }
                })
                .then(response => {
                    console.log(response.data);
                    // bus.$emit('test', 'hello');
                    window.location = '/home';
                });
            }
        },
    }
</script>
