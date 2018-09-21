
<template>
    
    <div>
        <hr>
        <p class="text-center">
            <p class="text-center" v-for="like in post.likes" :key="like.id">

                <img :src="like.user.avatar" alt="" width="20px" height="20px" class="avatar-like">
            //avatars of likers
        </p>

        <hr>
        <button class="btn btn-xs btn-primary" v-if="!auth_user_likes_post" @click="like()">
                        Like Shout
        </button>

        <button class="btn btn-xs btn-danger" v-else @click="Unlike()">
                        Unlike Shout
        </button>

    </div>

</template>

<script>
export default {
    
    mounted() {

    },

    props: ['id'],

    computed:{
        likers() {

            var likers = []

            this.post.likes.forEach((like) => {

                likers.push(like.user.id)
                
            })

            return likers

        },

        auth_user_likes_post() {
            var check_index = this.likers.indexOf(
                this.$store.state.auth_user.id
            )

            if(check_index === -1 )

                return false

            else
            
                return true
        },

        post() {
            this.$store.posts.find( (post) => {

                return post.id === this.id
            })
        }
    },

    methods: {

        like() {
            this.$http.get('/like/' + this.id)

            .then((resp) => {
                this.$store.commit('update_post_likes', {

                    id: this.id,
                    like: resp.body
                })

                noty({
                        type : success,
                        layout: 'bottomLeft',
                        text: 'Shout liked !'
                    })
            })
        },

        unlike() {
            this.$http.get('/unlike/' + this.id)

            .then((response) => {
                this.$store.commit('unlike_post', {

                    post_id: this.id,
                    like_id: response.body
                })

                noty({
                        type : success,
                        layout: 'bottomLeft',
                        text: 'Shout unliked !'
                    })
            })

        }
    }
}
</script>

<style>

.avatar-like{
    border-radius: 50%;
}
</style>

