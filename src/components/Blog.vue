<!-----=====|| {( START:- BLOG )} ||=====----->
<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 p-0">
                <div class="blog-background">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="about-heading">
                                    <p>{{ subtitle }}</p>
                                    <h1>{{ title }}</h1>
                                    <div class="statusBar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div 
                                v-for="items in Blogitem" 
                                :key="items.id" 
                                class="col-12 col-md-12 col-lg-4 col-xl-4" >
                                <BlogPage
                                    :images="items.images"
                                    :heading="items.heading"
                                    :text="items.text"
                                    :btn="items.btn"
                                    :time="items.time"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<!-----=====|| {( END:- BLOG )} ||=====----->

<!-----=====|| {( START:- BLOG JAVASCRIPT )} ||=====----->
<script>
    import BlogPage from './Cart/BlogPage.vue'

    export default {
        data (){
            return {
                subtitle: 'Check out my latest blog posts',
                title: 'My Blog',
                Blogitem: [
                    {
                        images: require('@/assets/blog/post-1.jpg'),
                        heading: 'Top tools for Photographers',
                        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, porro rem quod illo quam, eum alias id, repellendus',
                        btn: 'Read More',
                        time: '1 january 2024'
                    },
                    {
                        images: require('@/assets/blog/post-2.jpg'),
                        heading: 'Take a tour of my office',
                        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, porro rem quod illo quam, eum alias id, repellendus',
                        btn: 'Read More',
                        time: '5 january 2024'
                    },
                    {
                        images: require('@/assets/blog/post-3.jpg'),
                        heading: 'How i became a Web Designer',
                        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, porro rem quod illo quam, eum alias id, repellendus',
                        btn: 'Read More',
                        time: '7 january 2024'
                    },
                    {
                        images: require('@/assets/blog/post-4.jpg'),
                        heading: 'How to improve work performance',
                        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, porro rem quod illo quam, eum alias id, repellendus',
                        btn: 'Read More',
                        time: '2 february 2024'
                    },
                    {
                        images: require('@/assets/blog/post-5.jpg'),
                        heading: 'How to work from home',
                        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, porro rem quod illo quam, eum alias id, repellendus',
                        btn: 'Read More',
                        time: '6 february 2024'
                    },
                    {
                        images: require('@/assets/blog/post-6.jpg'),
                        heading: 'How to enjoy your business trip',
                        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, porro rem quod illo quam, eum alias id, repellendus',
                        btn: 'Read More',
                        time: '9 february 2024'
                    },
                ]
            }
        },
        components: {
            BlogPage
        }
    }
</script>
<!-----=====|| {( END:- BLOG JAVASCRIPT )} ||=====----->

<!-----=====|| {( START:- BLOG STYLE )} ||=====----->
<style scoped>
    .blog-background { width: 100%; height: 1080px; background-color: #000; }
</style>
<!-----=====|| {( END:- BLOG STYLE )} ||=====----->