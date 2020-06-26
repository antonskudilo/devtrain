<template>
    <div class="container">
        <carousel :autoplay="true">

            <div v-for="post in posts">
                <p>{{ post.image }}</p>
            </div>

        </carousel>
    </div>
</template>

<script>
    import carousel from "vue-owl-carousel";

    export default {
        components: { carousel },

        data: function () {
            return {
                posts: [],
            };
        },
        mounted() {
            axios.get('/api/posts').then((response) => {
                    this.posts = response.data;
                });
        },
    }
</script>
