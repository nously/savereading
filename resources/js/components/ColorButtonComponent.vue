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
                    if (colors[i][0] == this.status) {
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
                    var items = document.getElementsByClassName('colored');
                    var j = 0;
                    for (j; j < items.length; j++)
                    {
                        items[j].classList.replace(this.status, colors[i][0]);
                        if (colors[i][0] == "bg-warning" || colors[i][0] == "bg-light") {
                            items[j].classList.remove('text-white');
                        } else {
                            items[j].classList.add('text-white');
                        }
                    }
                    this.status = colors[i][0];
                    // window.location = '/home';
                });
            }
        },
    }
</script>
