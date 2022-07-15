<template>
    <div>
        <h2>{{ post.title }}</h2>
        <h5>Category: {{ post.category.category }}</h5>
        <p>{{ post.content }}</p>
        <em
        v-for="tag in post.tags"
        :key="`tag${tag.id}`"
        class="post-tags">{{ tag.name }}</em>
        <i class="d-block">Updated on: {{ formatDate() }}</i>
    </div>
</template>

<script>
import { apiUrl } from '../../data/config';

export default {
    name: 'PostshowComp',

    data(){
        return{
            apiUrl,
            post: null
        }
    },
    methods:{
        getApi(){
            axios.get(this.apiUrl + '/' + this.$route.params.slug)
            .then(res => {
                // console.log(res.data);
                this.post = res.data.post
            })
        },

        formatDate(){
            const jsd = new Date(this.post.updated_at);
            let d = jsd.getDate();
            let m = jsd.getMonth() + 1;
            const y = jsd.getFullYear();
            if(d < 10)d = '0' + d;
            if(m < 10)m = '0' + m;

            return `${d}/${m}/${y}`
        }
    },
    mounted(){
        this.getApi()
    }
}
</script>

<style lang="scss" scoped>
h2{
    text-transform: capitalize;
}

.post-tags{
    margin: 10px 4px;
    padding: 3px 6px;
    background-color: #007BFF;
    border-radius: 10px;
}
</style>
