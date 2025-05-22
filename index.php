<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="main.js?ver=<?=time()?>"></script>
    <link rel="stylesheet" href="style.css?ver=<?=time()?>">
    <title>File Manager</title>
</head>
<body style="overflow:hidden;margin:0;background-color:white">
    <div style="position:absolute;
                width:calc(100% - 16px);
                height:calc(100% - 16px);
                display:none" id="durak">
        <div style="position:absolute;
                    top:50%;
                    left:50%;
                    transform:translate(-50%,-50%);
                    background-color:#999">
            <p>ты точно хочешь удалить эту хуетень?</p><br>
            <button id="durak2">ага</button>
            <button id="durak3" onclick="document.getElementById('durak').style.display='none'">неа</button>
        </div>
    </div>

    <div style=height:120px;display:flex;flex-direction:row>
        <div style=display:flex;flex-direction:column>
        <div class="directory" id="thisIsPath!!"><span id="pos" ondblclick="replacePath()">../</span></div>
            <div>
                <button id="refresh" onclick="refreshPath(path)">Refreesh</button><br>
                <button id="back" onclick="openFolder('../')">Main folder</button>
                <button id="drop" onclick="drop(path)">Go up</button>
                <button onclick="history.back()">&lt;</button>
                <button onclick="history.forward()">&gt;</button>
            </div>
            <div>
                <input id="filename" placeholder="file/dir name">
                <button onclick="fileCreateOptions('MAKEFILE')">create file</button>
                <button onclick="fileCreateOptions('MAKEDIR')">make dir</button><br>
            </div>
            <div>
                <input type="file" id="uploadFile" multiple="">
                <button onclick="uploadFile()">оно не работает</button>
                <progress id=loadProg style=display:none></progress>
            </div>
        </div>
        <div>
            <h1>Windows!</h1>
            <div>
                <div id=windowses style=display:inline>
                    <button onclick=getWindow(0) ondblclick=openWindow(0) id=w0 class=windowButtonSelected>
                        ../
                    </button>
                </div>
                <div style=display:inline>
                    <button onclick="createWindow()">+</button>
                </div>
            </div>
        </div>
    </div>
    <div onclick="document.getElementById('skip').style.display='none'" id="skip" style="position:absolute;
                right:8px;
                top:8px;
                width:250px;
                background:rgba(255,255,255,0.8)">
        <p>GUIDE</p>
        <p>
            arrow up-down = select files<br>
            BACKSPACE = folder up<br>
            ENTER = open folder/file<br><br>
            F2 = rename file<br>
            ENTER = set name (only rename)<br>
            ESC = abort rename (only rename)<br><br>
            DEL = delete file<br>
            ENTER = yes (delete window only)<br>
            ESC = no (delete window only)<br><br>

            click to hide
        </p>
    </div>
    <div class=filemgr id=filemgr style="height:calc(100vh - 120px);overflow-y:scroll">
        <div id=Window0>
            <table id=table0 style=width:100%>
                <tbody id="place0"></tbody>
            </table>
        </div>
    </div>
    <script>
        if (path[path.length - 1] === '/') {
            openFolder(path);
        } else {
            openFile(path);
        }
    </script>
</body>