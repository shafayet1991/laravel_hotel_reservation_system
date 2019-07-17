<template>
    <div>
        <calendar-component></calendar-component>
    </div>
</template>

<script>
    import CalendarComponent from './components/CalendarComponent';
    export default {
        name: "App",
        components:{
            'calendar-component':CalendarComponent,
        }
    }
</script>

<style scoped>

</style>