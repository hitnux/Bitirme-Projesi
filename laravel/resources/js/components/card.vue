<template>
<div class="flipcard">
    <div class="flipcard__body">
        <img :src="src" class="flipcard__img"/>
        <div class="flipcard__brand">
            <h1>{{title}}</h1>
            <p class="flipcard__price primary">{{price}} ₺</p>
        </div>
    </div>
</div>
</template>

<script>

export default {
    name: 'Flipcard',
    props: {
        src: {
            type: String
        },
        price:{
            type: String,
            default: '0.00'
        },
        title:{
            type: String,
            default: 'Title'
        }
  },
}
</script>

<style scoped>
.flipcard{
    margin: 2rem 1rem;
    cursor: pointer;
    background: #fff;
    border-radius: 5px;
    width: 300px;
}
.flipcard__body{
    padding: 15px;
    margin: auto;
    text-align: left;
}
.flipcard__img{
    border-radius: 5px;
    width: 100%;
    max-height: 200px;
}
.flipcard__brand{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.flipcard__price{
    font-size: 1.5rem;
    color: #4BA252;
}
</style>
