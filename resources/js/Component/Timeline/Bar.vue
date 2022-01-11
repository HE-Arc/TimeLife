
<template>
    <div>
        <span class="vertical-bar"></span>
    <time>
        <template v-if="date.day !== 0"> {{ date.day }} <br /> </template>
        <template v-if="date.month !== 0"> <br /> </template>
        {{ date.year }}
    </time>
        <span class="vertical-bar bottom"></span>
    </div>
</template>
<script>
export default {
    name: "Bar",
    data() {
        return {
            date: {
                day: "10",
                year:"2021"
            }
        }
    }
}
</script>

<style scoped lang="scss">

$bar-color: #fab795;

time {
    width: 120px;
    height: 120px;
    margin: 15px;
    text-align: center;
    border: 3px solid #fac29a;
    border-radius: 100%;
    background-color: #1a1c23;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index:10
}

time::before,
time::after {
    content: " ";
    width: 110%;
    height: 5px;
    display: block;
    background: $bar-color;
    top: 50%;
    position: absolute;
    z-index: 5;
}

time::after {
    left: 100%;
}
time::before {
    right: 100%;
}

.vertical-bar {
    &::before, &::after {
        content: " ";
        height:40px;
        width:5px;
        background-color: $bar-color;
        display:block;
        position:absolute;
        left:50%;
        z-index:5;
    }
    &.bottom {
        &::before, &::after {
            margin-top:-20px;
        }
    }
}

</style>
