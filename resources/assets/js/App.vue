<template>
    <div class="section">
        <div class="container">
            <simple-upload/>
        </div>
    </div>   
</template>

<script>
import SimpleUpload from './components/SimpleUpload.vue';

export default {
    name: "App",
    components: { SimpleUpload}
}
</script>