<template>
    <div>
        <add-image v-for="(url, key) in images_json" :idImage="key" :label="getLabel(key)" :errs="errorsM" :url="url"></add-image>
        <button @click="addNewImage">+</button>
        <input type="hidden" name="test" :value="JSON.stringify(images_json)">
    </div>
</template>

<script>
import addImage from './addImage.vue'
    export default {
        props: ['errors', 'images','url'],
        components: {
        addImage
        },
        data: function() {
            return {
                images_json: this.images,
                errorsM: JSON.parse(this.errors)
            }
        },
        methods: {         
            addNewImage(event){
                event.preventDefault();
                let ln = Object.keys(this.images_json).length;
                if(ln < 6)
                {
 
                    let n_images = {};
                    for(let key in this.images_json)
                    {
                        if(this.images_json[key].search(this.url) == -1)
                        {
                            n_images[key] = this.url+"/"+this.images_json[key];
                        }
                        else
                        {
                            n_images[key] = this.images_json[key];
                        }
                        
                    }

                    n_images['img_'+ln] = this.url+"/storage/images/imageVide750x600.jpg";

                    this.images_json = n_images; 
                }
                
            },
            getLabel(ind){
                if(ind == "img_base") return "Image principale"; else return "Image supplémentaire";                
            }
        },               
        mounted() {

            let n_images = {};
            for(let key in this.images_json)
            {
                n_images[key] = this.url+"/"+this.images_json[key];
            }
            this.images_json = n_images;

            console.log('Component mounted.')
        }
    }
</script>