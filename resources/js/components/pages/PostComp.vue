<template>
    <div>
        <div class="mt-3 ">
            <h3>{{ post.title }}</h3>
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
        }
    }
}
</script>

<style lang="scss" scoped>
h3{
    text-transform: capitalize;
}
p{
    margin-bottom: 0;
}
</style>
