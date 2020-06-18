<template>
<div class="shoppingcard">
    <b-button type="is-dark" @click="showScard" icon-left="cart">Sepet</b-button>
    <div class="shoppingcard__body" v-if="showShopcard">
        <ul class="shoppingcard__list">
            <li class="shoppingcard__item" v-for="urun in urunler" :key="urun.id">
                <div class="shoppingcard__item--body">
                    <a :href="'/urun/'+urun.slug"><b>{{urun.title}}</b></a>
                    <div class="shoppingcard__item--right">
                        <input 
                            type="number" 
                            class="shoppingcard_piece" 
                            name="piece" 
                            min="1"
                            max="9"
                            v-model="urun.piece" 
                            @change="updatecard(urun.id,urun.piece)"/>
                            <b-button>{{urun.price*urun.piece}} ₺</b-button>
                    </div>
                </div>
                <b-button type="is-dark" @click="pushCard(urun.id)">Sil</b-button>
            </li>
        </ul>
        <div style="display:flex;justify-content:center;align-items:center;">
            <div style="position: absolute;bottom: 3px;"><b-button @click="toast" type="is-dark">Alışverişi Tamamla</b-button></div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'Shoppingcard',
    data() {
        return {
            showShopcard: false,
            urunler: null,
            piece: 1
        }
    },
    methods: {
        showScard(){
            if(this.showShopcard){
                this.showShopcard=false;
            }else{
                this.showShopcard=true;
                this.getcarddata();
            }
        },
        getcarddata(){
            this.axios.get('/shoppingcard')
            .then(response => {
                this.urunler = response.data;
            })
            .catch(error => console.log(error))
        },
        pushCard(id){
            this.axios.get('/pushcard/'+id)
                .then(response => {
                    console.log(id+'sepetten kaldırıldı');
                    this.showShopcard=false;
                    this.showScard();
                })
                .catch(error => console.log(error))
        },
        updatecard(id,piece){
            this.axios.post('/updatecard', {
                id: id,
                piece: piece
            })
            .then(response => {
                console.log(id+'güncellendi');
            })
            .catch(error => console.log(error))
        },
        toast() {
            this.axios.get('/purchase')
                .then(response => {
                    this.showShopcard = false;
                    this.$buefy.toast.open('Siparişiniz Alındı');
                    console.log('Sipariş alındı');
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
    bottom:-300px;
    right:0;
    height: 300px;
    width: 500px;
    z-index: 10;
}
.shoppingcard__item{
    padding: .7rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: solid 1px #dcdcdc;
    color: black;
}
.shoppingcard_piece{
    border-radius: 5px;
    border: solid 1px #DCDCDC;
    padding: 5px;
    width: 40px;
}
.shoppingcard__list{
    overflow-y: scroll;
    height: 210px;
}
.shoppingcard__item--body{
    width:100%;
}
.shoppingcard__item--right{
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding: .2rem .7rem 0 0;
}
</style>
