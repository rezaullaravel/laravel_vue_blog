<template>

	<div class="container-fluid" style="padding-top: 50px;">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                 <div class="col-lg-10 offset-lg-1">


                    <div class="card">
                        <div class="card-header">
                            <h2 class="bg-light">All Category

                                <router-link to="/category/create"  class="btn btn-success" style="float: right" title="Create Category"><i class="las la-plus-square"></i></router-link>
                            </h2>


                        </div>

                        <div class="card-body">


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="category in result">
                                        <td>{{ category.id }}</td>
                                        <td>{{ category.categoryName }}</td>
                                        <td>
                                            <router-link :to="{name:'editCategory',params:{ id:category.id } }" class="btn btn-success" title="Edit"><i class="las la-edit"></i></router-link>

                                            <button type="button" @click.prevent ="deleteCategory(category)"  class="btn btn-danger" title="Delete"><i class="las la-trash"></i></button>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
            </div>
            <!-- /.row -->
            <FlashMessage></FlashMessage>

        </div><!-- /.container-fluid -->


</template>


<script>




 export default{
            data(){
                return{
                    result: [

                    ],
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
            deleteCategory(category){
                if(confirm('Are you sure to delete this category???')){
                    axios.get('/delete/category/'+category.id)
                    .then((response)=> {

                        this.flashMessage.success({
                            title: 'Success',
                            message: 'Category deleted successfully',
                            time: 5000,
                            flashMessageStyle: {
                                backgroundColor: 'linear-gradient(#e66465, #9198e5)',

                            }
                        });

                        let index = this.result.indexOf(category);
                        this.result.splice(index, 1);

                 })
                }
            }
        }






 }
</script>






