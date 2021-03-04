<template>
    <div class="form-group">
        <label :for="idImage">{{ label }}</label>
        <div class="custom-file mt-3 mb-5">
            <input type="file" :class="'custom-file-input'+checkValid()" :id="idImage" :name="idImage">
            <label class="custom-file-label" :for="idImage">{{ label }}</label>
            <div class="box_image_preview row mb-5 mt-3">
                <img :src="url">
            </div>
        <div class="invalid-feedback">{{ getError() }}</div>    
        </div>
   
    </div>
</template>

<script>
    export default {
        props: ['idImage','label','errs','url'],
        methods: {
            getError(){
                if(this.errs[this.idImage]) return this.errs[this.idImage][0]; else return "";
            },
            checkValid(){
                if(this.errs[this.idImage]) return " is-invalid"; else return "";
                
            }
        },        
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>