<template>
    <div class="app flex-box cent" id="Output_Form">
        <h2 class="text-center">Форма для вывода данных из базы</h2>
        <div class="output-box">
            <div class="output-table" v-html="dataset">
                <ul class="header-output-table">
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'dataset'
    ]}
</script>
