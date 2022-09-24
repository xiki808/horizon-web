<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import MovieLayout from '@/Layouts/Movies/MovieLayout.vue';

defineProps({
    movie: Object,
    canLogin: Boolean,
    canRegister: Boolean,
})
</script>
    
<template>
    <div>{{page}}</div>
    <HomeLayout :canLogin="canLogin" :canRegister="canRegister">
        <MovieLayout :movie="movie" />
    </HomeLayout>
</template>
    