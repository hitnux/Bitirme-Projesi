<template>
<div style="margin:1rem 0;display:flex;">
            <b-numberinput style="margin-right:.5rem;" controls-position="compact" type="is-dark" min="1" max="9" v-model="piece"></b-numberinput>
            <b-button @click="addShoppingCard()" type="is-dark">Sepete Ekle</b-button>
        </div>
</template>

<script>
export default {
    name: 'Shoppingcard',
    data() {
        return {
            piece: 1
        }
    },
    props: {
        id: {
            type: String,
            default: null
        }
    },
    methods: {
        addShoppingCard(){
            this.axios.post('/addcard', {
                id: this.id,
                piece: this.piece
            })
            .then(response => {
                this.$buefy.toast.open({
                    message: 'Ürün Sepete Eklendi',
                    position: 'is-bottom',
                    type: 'is-dark'
                })
            })
            .catch(error => console.log(error))
        }
    }
}
</script>

<style>
.shoppingcard{
    position: relative;
    color: black;
}
.shoppingcard__body{
    background: white;
    border-radius: 5px;
    border: solid 1px #dcdcdc;
    position: absolute;
    bottom:-250px;
    right:0;
    height: 250px;
    width: 250px;
    z-index: 10;
}
</style>
