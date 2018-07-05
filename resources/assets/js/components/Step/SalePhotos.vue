<template>
<div>
  <transition-group name="fade" appear>
    <div class="mt-4" key="box1">
      <h3>Add photos to your listing (up to 5 photos)</h3>
      <p>Click the button below to select and upload photos. Sales with photos get preferred treatment on our site because buyers love to get a preview of what will be at the sale. If you aren't ready to add photos right now, you can always come back and add photos later.</p>
    </div>
    <div class="card border-primary mt-4" key="box2">
        <div class="card-body">
          <h4>Add Photos</h4>
          <div class="custom-file">
            <template v-if="multiImageUrl">
              <div class="row">
                <div class="col-md-4" v-for="(file, index) in files" :key="file.id">
                  <img v-if="file.thumb" class="img-thumbnail mt-1" :src="file.thumb" width="200" height="200" />
                </div>
              </div>
            </template>
            <div class="my-btnFile">
              <file-upload
                class="btn btn-primary btn-block my-4"
                post-action="/upload/post"
                extensions="gif,jpg,jpeg,png,webp"
                accept="image/png,image/gif,image/jpeg,image/webp"
                :multiple="true"
                :size="1024 * 1024 * 10"
                v-model="files"
                @input-filter="inputFilter"
                @input-file="inputFile"
                ref="upload"
              >Select files</file-upload>
            </div>
          </div>
        </div>
    </div>
  </transition-group>
  <div class="mt-4">
    <button @click="cancel" class="btn btn-outline-dark">Cancel</button>
    <button @click="next" class="btn btn-primary">Next</button>
  </div>
</div>
</template>

<script>

import FileUpload from 'vue-upload-component'

export default {

  data(){
    return {
      files: [],
    }
  },

  computed: {
    multiImageUrl(){
      return this.files.length > 0;
    }
  },

  methods: {

    inputFilter(newFile, oldFile, prevent) {

       if (newFile && !oldFile) {
        // Before adding a file
        // 添加文件前
        // Filter system files or hide files
        // 过滤系统文件 和隐藏文件
        if (/(\/|^)(Thumbs\.db|desktop\.ini|\..+)$/.test(newFile.name)) {
          return prevent()
        }

      }
      if (newFile && (!oldFile || newFile.file !== oldFile.file)) {
        // Create a blob field
        // 创建 blob 字段
        newFile.blob = ''
        let URL = window.URL || window.webkitURL
        if (URL && URL.createObjectURL) {
          newFile.blob = URL.createObjectURL(newFile.file)
        }
        // Thumbnails
        // 缩略图
        newFile.thumb = ''
        if (newFile.blob && newFile.type.substr(0, 6) === 'image/') {
          newFile.thumb = newFile.blob
        }
      }

    },
    inputFile(newFile, oldFile) {
      if (newFile && !oldFile) {
        // add
        console.log('add', newFile)
      }
      if (newFile && oldFile) {
        // update
        console.log('update', newFile)
      }
      if (!newFile && oldFile) {
        // remove
        console.log('remove', oldFile)
      }
    },

    next(){
      EventBus.$emit('changeComponent', 'appSaleSumamry', '100%');
    },

    cancel(){
      EventBus.$emit('changeComponent', 'appSalePhotos', '70%');
    }
  },

  components: {
    FileUpload,
  },

}
</script>

<style>
</style>
