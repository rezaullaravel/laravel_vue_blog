<template>

    <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                 <div class="col-sm-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="bg-light">Add Blog
                                <router-link to="/blog" class="btn btn-success" style="float: right;">Blog List</router-link>
                            </h2>


                        </div>

                        <div class="card-body">
                            <form @submit.prevent="storeBlog">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select name="category_id" v-model="form.category_id" class="form-control">
                                        <option :value="category.id" v-for="category in result">{{ category.categoryName }}</option>
                                    </select>
                                   <div class="text-danger" v-if="form.errors.has('category_id')" v-html="form.errors.get('category_id')"/>
                                </div>

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" v-model="form.title" class="form-control">

                                   <div class="text-danger" v-if="form.errors.has('title')" v-html="form.errors.get('title')"/>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" v-model="form.description" class="form-control" rows="5"></textarea>

                                   <div class="text-danger" v-if="form.errors.has('description')" v-html="form.errors.get('description')"/>
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" id="blah" @change="handleFile" class="form-control">

                                   <div class="text-danger" v-if="form.errors.has('image')" v-html="form.errors.get('image')"/>

                                   <img  :src="imagePreview" width="150px" />
                                </div>

                                <div class="form-group">
                                    <label>Author name</label>
                                    <input type="text" name="author_name" v-model="form.author_name" class="form-control">

                                   <div class="text-danger" v-if="form.errors.has('author_name')" v-html="form.errors.get('author_name')"/>
                                </div>

                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" value="Add" class="btn btn-success" style="float: right;">
                                </div>


                            </form>
                        </div>


                    </div>
                 </div>
            </div>
            <!-- /.row -->
            <FlashMessage></FlashMessage>

        </div><!-- /.container-fluid -->



</template>


<script>
import Form from 'vform'


 export default{
    data(){
        return{
            form: new Form({

                    category_id:'',
                    title:'',
                    description:'',
                    author_name:'',
                    image:null,


           }),

           imagePreview:null,

           result:[],
        }
    },

    mounted(){
            axios.get('/show/category')
           .then((response)=> {
            this.result = response.data.categories
            //console.log(response.data.categories)

        })

        },//end mounted

    methods:{
        async storeBlog(){

            //console.log(this.form.title);

         await this.form.post('/store/blog')

        this.form.category_id = '';
        this.form.title = '';
        this.form.description = '';
        this.form.author_name = '';
        //console.log('success');


         this.$router.push('/blog')

         this.flashMessage.success({
                            title: 'Success',
                            message: 'Blog created successfully',
                            time: 5000,
                            flashMessageStyle: {
                                backgroundColor: 'linear-gradient(#e66465, #9198e5)',

                            }
                        });
    },//end method

    handleFile (event) {
      const image = event.target.files[0]
      this.form.image = image
    //preview image
     let reader = new FileReader();
     reader.addEventListener("load",function(){
        this.imagePreview = reader.result;
     }.bind(this), false);
     if(this.form.image){
        reader.readAsDataURL(this.form.image);
     }
    },
    }

 }
</script>




