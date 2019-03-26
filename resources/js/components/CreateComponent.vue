<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="/admin/article">Article</a>
                    <a class="nav-link" href="#">Link</a>
                    <a class="nav-link" href="#">Link</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </nav>
            </div>
            <div class="col-md-8">
                <a class="btn btn-primary" href="/admin/article/create" role="button">New</a>
                <form>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Title</label>
                            <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Title"
                                   v-model="title" value="" name="title" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTextarea">Content</label>
                            <textarea class="form-control is-invalid" id="validationTextarea"
                                      placeholder="Required example content" name="content" required
                                      v-model="content"></textarea>
                            <div class="invalid-feedback">
                                Please enter a message in the textarea.
                            </div>
                        </div>
                    </div>
                </form>
                <button class="btn btn-primary" @click="create()">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: '',
                content: ''
            }
        },
        methods: {
            check() {
                if (this.title == '') {
                    return false
                }
                if (this.content == '') {
                    return false
                }
                return true
            },
            create() {
                let checked = this.check();
                axios({
                    method: 'post',
                    url: '/admin/article',
                    data: {
                        title: this.title,
                        content: this.content
                    }
                });

                console.log(checked)
            }
        },
        mounted() {
            console.log('create mounted.')
        }
    }
</script>
