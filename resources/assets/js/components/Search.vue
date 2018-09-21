
<template>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <input type="text" class="input-lg form-control" v-model="query" @keyup.enter="search()">
                <br>

                <div class="row" v-if="results.length">
                    <div class="text-center" v-for="user in results" :key="user.id">

                        <img :src="user.avatar" alt="" width="50px" height="50px" class="searched_user">
                        <h4 class="text-center">{{user.name}}</h4>
                    </div>

                </div>

            </div>
        </div>

    </div>

</template>

<script>

    var algoliasearch = require('algoliasearch')

    var client = algoliasearch('A2BQZPONPD', '5a4c3c2ae15b6ad22f7f394fb18ba8c0');

    var index = client.initIndex('users')

export default {

    mounted() {

    }, 

    data(){
        return {
            query: '',
            results: []
        }

    }, 

    methods:{
        search(){
            index.search(this.query, (err, content) =>{
                this.results = content.hits
            })
        }
    }
}
</script>

<style>
.searched_user{
    border-radius: 50%;
}
</style>

