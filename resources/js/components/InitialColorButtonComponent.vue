<template>
    <div @click="setColor">
        <div >&nbsp;</div>    
    </div>
</template>

<script>
    export default {        
        props: [
            'item_color'
        ],
        
        mounted() {
            console.log('Component mounted.')
        }, 
        methods: {
            setColor : function() {
                document.getElementById('item_color_input').value = this.item_color;
            }
        },
    }
</script>
