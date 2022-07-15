<template>
    <div>
        <h2>{{ post.title }}</h2>
        <p>{{ post.content }}</p>
        <i>Updated on: {{ formatDate() }}</i>
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
                console.log(res.data);
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
</style>
