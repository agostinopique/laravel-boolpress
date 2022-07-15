<template>
    <div>
        <div class="mt-3 ">
            <h3><router-link class="post-link" :to="{name: 'details', params:{slug: post.slug}}">{{ post.title }}</router-link></h3>
            <i>{{formatDate}}</i>
            <p>{{ shortContent }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostComp',
    props:{
        post:Object
    },

    computed:{
        shortContent(){
            return this.post.content.substr(0, 40) + "...";
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
    }
}
</script>

<style lang="scss" scoped>
h3{
    text-transform: capitalize;
    .post-link{
        color: white;
        &:hover {
            color: #007BFF;
        }
    }

}
p{
    margin-bottom: 0;
}
</style>
