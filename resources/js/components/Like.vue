<template>
  
    <button
      type="button"
      class="action-icon btn"
    >
      <i class="fas fa-heart"
         :class="{'icon-like':this.isLike}"
         @click="clickLike"
      ></i>
    </button>
    
</template>

<script>
  export default {
    props: {
      initialIsLike: {
        type: Boolean,
        default: false,
      },
      initialCountLikes: {
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
        isLike: this.initialIsLike,
        countLikes: this.initialCountLikes,
        gotToLike: false,
      }
    },
    methods: {
      clickLike() {
        if (!this.authorized) {
          alert('いいね機能はログイン中のみ使用できます')
          return
        }
        this.isLike
          ? this.unlike()
          : this.like()
      },
      async like() {
        const response = await axios.put(this.endpoint)
        this.isLike = true
        this.countLikes = response.data.countLikes
        this.gotToLike = true
      },
      async unlike() {
        const response = await axios.delete(this.endpoint)
        this.isLike = false
        this.countLikes = response.data.countLikes
        this.gotToLike = false
      },
    },
  }
</script>