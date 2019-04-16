<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col ">
                <a class="btn btn-primary" href="javascript:history.back()" role="button">Back</a>
                <form>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control"
                                   v-bind:class="{'is-valid': title_is_valid, 'is-invalid': title_is_invalid}"
                                   placeholder="Title"
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
                            <label>Content</label>
                            <textarea class="form-control"
                                      v-bind:class="{'is-valid': content_is_valid, 'is-invalid': content_is_invalid}"
                                      placeholder="Required example content" name="content" required
                                      v-model="content" style="height:600px; width:580px;"></textarea>
                            <div class="invalid-feedback">
                                Please enter content in the textarea.
                            </div>
                        </div>
                    </div>
                </form>
                <button class="btn btn-primary" @click="save()">Update</button>
            </div>
            <div id="preview" class="col "
                 style="height: 97%; max-height: 97%; border: 1px solid #eee; overflow-y: scroll;  padding: 10px;">
            </div>
        </div>
    </div>

</template>
<script>
    export default {
        props: [ 'id'],
        data() {
            return {
                title: null,
                title_is_valid: false,
                title_is_invalid: false,
                content:null,
                content_is_valid: false,
                content_is_invalid: false,
            }
        },
        methods: {
            load() {
                let me = this;
                axios({
                    method: 'get',
                    url: '/admin/article/' + this.id
                }).then(function (response) {
                    let status = response.data.status ;
                    let data = response.data.data ;
                    if (status== 200) {
                        me.title = data.title;
                        me.content = data.content;
                    }
                })
            },
            check() {
                if (this.title == '') {
                    this.title_is_invalid = true;
                    return false
                } else {
                    this.title_is_invalid = false;
                    this.title_is_valid = true;
                }
                if (this.content == '') {
                    this.content_is_invalid = true;
                    return false
                } else {
                    this.content_is_invalid = false;
                    this.content_is_valid = true;
                }
                return true
            },
            save() {
                let checked = this.check();
                let me = this;
                if (checked) {
                    axios({
                        method: 'put',
                        url: '/admin/article/' + me.id,
                        data: {
                            title: me.title,
                            content: me.content,
                        }
                    }).then(function (response) {
                        swal(response.data.msg, {
                            buttons: false,
                            timer: 2000,
                        });
                        if (response.data.status == 200) {
                            window.href.location = history.back();
                        }
                    });
                }
            }
        },
        updated() {
            var converter = new showdown.Converter(),
                html = converter.makeHtml(this.content);
            $("#preview").html(html);
        },
        mounted() {
            this.load();
            console.log('create mounted.')
        }
    }
</script>
