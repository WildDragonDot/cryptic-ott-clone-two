function addFavourite(video_id, user_id) {
    if (user_id == '') {
        userLoginOut();
    } else {
        $.ajax({
            type: 'POST',
            url: 'php/addFavouritePaid',
            'async': false,
            dataType: "json",
            data: {
                "video_id": video_id,
                "user_id": user_id,
            },
            success: function (data) {
                if (data.status == '201') {
                    swal({
                        title: 'Added !',
                        text: `Successfully added in favourite list!`,
                        type: 'success',
                    }, ((value) => {
                        if (value) {
                            window.location.reload();
                        }
                    }));
                } else if (data.status == '501') {
                    swal({
                        title: 'Warning !',
                        text: `Already in your favourite List !`,
                        type: 'warning',
                    }, ((value) => {
                        if (value) {
                            console.log(value);
                        }
                    }));
                } else {
                    swal({
                        title: 'Warning !',
                        text: `Try again after some time !`,
                        type: 'warning',
                    }, ((value) => {
                        if (value) {
                            console.log(value);
                        }
                    }));
                }
            }
        });
    }
}

function addFavouriteWebseries(video_id, user_id) {
    if (user_id == '') {
        userLoginOut();
    } else {
        $.ajax({
            type: 'POST',
            url: 'php/addFavouriteWebseries',
            'async': false,
            dataType: "json",
            data: {
                "video_id": video_id,
                "user_id": user_id,
            },
            success: function (data) {
                if (data.status == '201') {
                    swal({
                        title: 'Added !',
                        text: `Successfully added in favourite list!`,
                        type: 'success',
                    }, ((value) => {
                        if (value) {
                            window.location.reload();
                        }
                    }));
                } else if (data.status == '501') {
                    swal({
                        title: 'Warning !',
                        text: `Already in your favourite List !`,
                        type: 'warning',
                    }, ((value) => {
                        if (value) {
                            console.log(value);
                        }
                    }));
                } else {
                    swal({
                        title: 'Warning !',
                        text: `Try again after some time !`,
                        type: 'warning',
                    }, ((value) => {
                        if (value) {
                            console.log(value);
                        }
                    }));
                }
            }
        });
    }
}


function removeVid(user_id, videoId) {
    $.ajax({
        type: 'POST',
        url: 'php/removeFavourite',
        'async': false,
        dataType: "json",
        data: {
            "user_id": user_id,
            "videoId": videoId,
        },
        success: function (data) {
            if (data.status == '201') {
                swal({
                    title: 'Removed !',
                    text: `Successfully removed from favourite list!`,
                    type: 'success',
                }, ((value) => {
                    if (value) {
                        window.location.reload();
                    }
                }));
            } else {
                swal({
                    title: 'Warning !',
                    text: `Try again after some time !`,
                    type: 'warning',
                }, ((value) => {
                    if (value) {
                        console.log(value);
                    }
                }));
            }
        }
    });
}

function removeWebSeries(user_id, videoId) {
    $.ajax({
        type: 'POST',
        url: 'php/removeFavouriteWebseries',
        'async': false,
        dataType: "json",
        data: {
            "user_id": user_id,
            "videoId": videoId,
        },
        success: function (data) {
            if (data.status == '201') {
                swal({
                    title: 'Removed !',
                    text: `Successfully removed from favourite list!`,
                    type: 'success',
                }, ((value) => {
                    if (value) {
                        window.location.reload();
                    }
                }));
            } else {
                swal({
                    title: 'Warning !',
                    text: `Try again after some time !`,
                    type: 'warning',
                }, ((value) => {
                    if (value) {
                        console.log(value);
                    }
                }));
            }
        }
    });
}

function storePathValues() {
    const storage = window?.sessionStorage;
    if (!storage) return;
    const currPath = `${window?.location.pathname}${window?.location.search}`;
    const prevPath = storage.getItem("currentPath");
    if (prevPath !== currPath) {
        storage.setItem("prevPath", prevPath);
    }
    storage.setItem("currentPath", currPath);
}

storePathValues();