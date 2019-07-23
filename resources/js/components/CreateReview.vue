<template>
    <div class="container my-3 py-3">
            <div class="row">
                <div class="col-md-11">
                    <h4 class="card-title">{{ itemName }}のレビュー</h4>
                </div>
                <div class="col-md-1">
                    <a :href="route">戻る</a>
                </div>
            </div>
            <div class="row justify-content-center my-3 ">
                <form method="POST" :action="route" accept-charset="UTF-8" enctype="multipart/form-data" class="form">
                    <input name="_token" type="hidden" :value="csrf">
                    <div class="form-group">
                        <div class="evaluation-submit">
                            <input id="star1" type="radio" name="evaluation" value="5" />
                            <label for="star1"><span class="text">最高</span>★</label>
                            <input id="star2" type="radio" name="evaluation" value="4" />
                            <label for="star2"><span class="text">良い</span>★</label>
                            <input id="star3" type="radio" name="evaluation" value="3" />
                            <label for="star3"><span class="text">普通</span>★</label>
                            <input id="star4" type="radio" name="evaluation" value="2" />
                            <label for="star4"><span class="text">悪い</span>★</label>
                            <input id="star5" type="radio" name="evaluation" value="1" />
                            <label for="star5"><span class="text">最悪</span>★</label>
                        </div>
                    </div>
                    <div class="form-group row px-3">
                        <label for="comment" class="col-md-9">コメント</label>
                        <input class="form-control" name="comment" type="text" id="comment">
                    </div>
                    <div class="form-group row">
                        <label for="files[][image]" class="col-md-3">写真</label>
                        <input name="files[][image]" type="file" id="files[][image]" class="col-9" multiple data-filesize="5000">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary form-control" type="submit" value="送信">
                    </div>
                </form>
            </div>
        </div>
</template>

<script>
    export default {
        props: {
            itemName: {
                type: String,
                required: true
            },
            menuId:{
                type: String,
                required: true
            },
            baseRoute: {
                type: String,
                required: true
            }
        },
        data: function() {
            return {
                // for now
                route: this.baseRoute + "/menus/" + this.menuId + "/reviews",
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        }
    }
</script>
