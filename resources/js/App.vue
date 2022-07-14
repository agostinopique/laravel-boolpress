<template>
    <div>
        <HeaderComp />
        <main class="pt-4 text-light">
            <div class="container">

                <router-view></router-view>
            </div>
        </main>
        <FooterComp />
    </div>
</template>

<script>
import HeaderComp from './components/partials/HeaderComp.vue';
import FooterComp from './components/partials/FooterComp.vue';

export default {
    name: 'app',
    components:{
        HeaderComp,
        FooterComp
    }
}
</script>

<style>
main{
    min-height: calc(100vh - 110px);
    background-color: #444554;
}
</style>
