<template>

    <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="bg-light">All Blog

                                <router-link to="/create/blog"  class="btn btn-success" style="float: right" title="Create Blog"><i class="las la-plus-square"></i></router-link>
                            </h2>


                        </div>

                        <div class="card-body">


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Blog title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Author Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="blog in result">
                                        <td>{{ blog.id }}</td>
                                        <td>
                                            {{ blog.category.categoryName }}
                                        </td>
                                        <td>{{ blog.title }}</td>
                                        <td>{{ blog.description }}</td>
                                        <td>
                                            <img :src="blog.image" alt="" width="80px" height="80px">
                                        </td>
                                        <td>{{ blog.author_name }}</td>
                                        <td width="15%">
                                            <router-link :to="`/edit/blog/${blog.id}`"  class="btn btn-success" title="Edit"><i class="las la-edit"></i></router-link>

                                            <button type="button" @click.prevent ="deleteBlog(blog)"  class="btn btn-danger" title="Delete"><i class="las la-trash"></i></button>
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
            axios.get('/show/blog')
           .then((response)=> {
            this.result = response.data.blogs
            //console.log(response.data.blogs)

        })

        },//end mounted


        methods:{
            deleteBlog(blog){
                if(confirm('Are you sure to delete this blog???')){
                    axios.get('/delete/blog/'+blog.id)
                    .then((response)=> {

                        this.flashMessage.success({
                            title: 'Success',
                            message: 'Blog deleted successfully',
                            time: 5000,
                            flashMessageStyle: {
                                backgroundColor: 'linear-gradient(#e66465, #9198e5)',

                            }
                        });

                        let index = this.result.indexOf(blog);
                        this.result.splice(index, 1);

                 })
                }
            }
        }






 }
</script>






