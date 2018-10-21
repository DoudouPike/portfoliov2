<template>
    <div class="hello">
        <b-alert show>Default Alert</b-alert>
        <h1>{{ msg }}</h1>
    </div>
</template>

<script>
    export default {
        name: 'hello',
        data () {
            return {
                msg: 'Welcome to Your Vue.js App'
            }
        }
    }
</script>