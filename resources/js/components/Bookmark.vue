<template>
  
    <button
      type="button"
      class="action-icon btn"
    >
        <i class="fas fa-bookmark"
           :class="{'icon-bookmark':this.isBookmark}"
           @click="clickBookmark"
        ></i>
    </button>
    
</template>

<script>
  export default {
    props: {
      initialIsBookmark: {
        type: Boolean,
        default: false,
      },
      initialCountBookmarks: {
        type: Number,
        default: 0,
      },
      authorized: {
        type: Boolean,
        default: false,
      },
      endpoint: {
        type: String,
      },
    },
    data() {
      return {
        isBookmark: this.initialIsBookmark,
        countBookmarks: this.initialCountBookmarks,
        gotToBookmark: false,
      }
    },
    methods: {
      clickBookmark() {
        if (!this.authorized) {
          alert('ブックマーク機能はログイン中のみ使用できます')
          return
        }
        this.isBookmark
          ? this.unbookmark()
          : this.bookmark()
      },
      async bookmark() {
        const response = await axios.put(this.endpoint)
        this.isBookmark = true
        this.countBookmarks = response.data.countBookmarks
        this.gotToBookmark = true
      },
      async unbookmark() {
        const response = await axios.delete(this.endpoint)
        this.isBookmark = false
        this.countBookmarks = response.data.countBookmarks
        this.gotToBookmark = false
      },
    },
  }
</script>