<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a class="btn btn-primary" href="/admin/article/create" role="button">New</a>
                <form>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label >Title</label>
                            <input type="text" class="form-control" v-bind:class="{'is-valid': title_is_valid, 'is-invalid': title_is_invalid}"  placeholder="Title"
                                   v-model="title" value="" name="title" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please input a title.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label >Content</label>
                            <textarea class="form-control"  v-bind:class="{'is-valid': content_is_valid, 'is-invalid': content_is_invalid}" placeholder="Required example content" name="content" required
                                      v-model="content" style="height:600px; width:480px;"></textarea>
                            <div class="invalid-feedback">
                                Please enter content in the textarea.
                            </div>
                        </div>
                    </div>
                </form>
                <button class="btn btn-primary" @click="create()">Submit</button>
            </div>
            <div id="preview" class="col-md-4" style="height: 97%; max-height: 97%; border: 1px solid #eee; overflow-y: scroll; width: 55%; padding: 10px;">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: '',
                title_is_valid: false,
                title_is_invalid: false,
                content: '',
                content_is_valid: false,
                content_is_invalid: false,
            }
        },
        methods: {
            check() {
                if (this.title == '') {
                    this.title_is_invalid = true;
                    return false
                }else {
                    this.title_is_invalid = false;
                    this.title_is_valid = true;
                }
                if (this.content == '') {
                    this.content_is_invalid = true;
                    return false
                }else {
                    this.content_is_invalid = false;
                    this.content_is_valid = true;
                }
                return true
            },
            create() {
                let checked = this.check();
                if (checked) {
                    axios({
                        method: 'post',
                        url: '/admin/article',
                        data: {
                            title: this.title,
                            content: $('#preview').html()
                        }
                    });
                }

                console.log(checked)
            }
        },
        updated() {
            var converter = new showdown.Converter(),
                html = converter.makeHtml(this.content);
            $("#preview").html(html);
        },
        mounted() {
            console.log('create mounted.')
        }
    }
</script>
