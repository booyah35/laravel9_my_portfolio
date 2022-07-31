function previewFile(file) {
    // プレビュー画像を追加する要素
    const preview = document.getElementById('preview');

    // FileReaderオブジェクトを作成
    const reader = new FileReader();

    // URLとして読み込まれたときに実行する処理
    reader.onload = function (e) {
        const imageUrl = e.target.result; // URLはevent.target.resultで呼び出せる
        const img = document.createElement("img"); // img要素を作成
        img.src = imageUrl; // URLをimg要素にセット
        const profileImage = document.getElementById("prf_img");
        profileImage.setAttribute('src', imageUrl);
    }
    // いざファイルをURLとして読み込む
    reader.readAsDataURL(file);
}    

// <input>でファイルが選択されたときの処理
const fileInput = document.getElementById('profile_image');
const handleFileSelect = () => {
    const files = fileInput.files;
    for (let i = 0; i < files.length; i++) {
        previewFile(files[i]);
    }
}

fileInput.addEventListener('change', handleFileSelect);
