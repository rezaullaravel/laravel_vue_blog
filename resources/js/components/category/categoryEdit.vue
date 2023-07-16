<template>
	<div class="content-wrapper">


        <!-- Main content -->
        <section class="content" style="padding-top: 50px;">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                 <div class="col-sm-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="bg-light">Edit Category
                                <router-link to="/category" class="btn btn-success" style="float: right;">Category List</router-link>
                            </h2>


                        </div>

                        <div class="card-body">
                            <form @submit.prevent="updateCategory">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="categoryName" v-model="form.categoryName" placeholder="Enter category name" class="form-control">
                                   <div class="text-danger" v-if="form.errors.has('categoryName')" v-html="form.errors.get('categoryName')"/>
                                </div>

                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" value="Update" class="btn btn-success" style="float: right;">
                                </div>


                            </form>
                        </div>


                    </div>
                 </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
        </section>
    <!-- /.content -->


  </div>




</template>


<script>
import Form from 'vform'


 export default{
    data(){
        return{
            form: new Form({
                categoryName: '',
           })
        }
    },

    methods:{
        async updateCategory(){
        let id = this.$route.params.id;
         await this.form.post('/update/category/'+id)

        this.$router.push('/category')

        this.flashMessage.success({
                            title: 'Success',
                            message: 'Category updated successfully',
                            time: 5000,
                            flashMessageStyle: {
                                backgroundColor: 'linear-gradient(#e66465, #9198e5)'
                            }
                        });
    }//end method
    },

    mounted(){
            let id = this.$route.params.id;
            axios.get('/edit/category/'+id)
           .then((response)=> {
           //console.log(response)
           this.form.categoryName = response.data.category.categoryName;

          })

        }//end method




 }
</script>




