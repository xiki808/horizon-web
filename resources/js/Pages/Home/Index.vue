<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import MovieListLayout from '@/Layouts/Movies/MovieListLayout.vue';

defineProps({
    movies: Object,
    page: Number,
    canLogin: Boolean,
    canRegister: Boolean,
    isLoggedIn: Boolean
})
</script>

<template>
    <HomeLayout :canLogin="canLogin" :canRegister="canRegister">
        <MovieListLayout :movies="movies" :page="page" :isLoggedIn="isLoggedIn" />
    </HomeLayout>
</template>
