<template>
<nav>
    <b-navbar>
        <template slot="brand">
            <b-navbar-item tag="router-link" :to="{ path: '/' }">
                <h1 class="title">Arporium</h1>
            </b-navbar-item>
        </template>
        <template slot="start">
            <b-navbar-item href="#">
                Documentation
            </b-navbar-item>
            <b-navbar-item href="#">
                Documentation
            </b-navbar-item>
        </template>

        <template slot="end">
            <b-navbar-item tag="div">
                <div class="buttons">
                    <slot></slot>
                </div>
            </b-navbar-item>
        </template>
    </b-navbar>
</nav>
</template>

<script>

export default {
    props: {
        path:{
            type: String,
            default: '/'
        }
    },
    data(){
        return{
            
        }
    },
    methods:{
    }
}
</script>

<style>
nav{
    background: white;
    width:100%;
}
.navbar{
    max-width: 1100px;
    margin:auto;
}
</style>
