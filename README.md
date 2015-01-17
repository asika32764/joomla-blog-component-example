# Joomla 開發者聖經 範例 Blog 元件

使用方式，從上方下拉選單的 tag 分頁，選擇你想要看的章節。

![p-2015-01-17-15](https://cloud.githubusercontent.com/assets/1639206/5788814/1d61134e-9e87-11e4-9e3b-f6c42c30848c.jpg)

進入 admin (後台) 或 site (前台) 目錄，就可以直接觀看原始碼。

![p-2015-01-17-16](https://cloud.githubusercontent.com/assets/1639206/5788817/52a1d3cc-9e87-11e4-88a3-9325e738450e.jpg)

## 安裝方式

由於前面的幾個章節還沒講到如何製作安裝檔，如果你想要把這個元件安裝起來查看，請遵照以下步驟來安裝

- 打開命令列，用 git clone 到某個目錄存放，例如 `D:\extensions`
- 把 `admin` 目錄內的東西複製到你的 Joomla 的 `administrator/components/com_blog` 目錄下
- 把 `site` 目錄內的東西複製到你的 Joomla 的 `components/com_blog` 目錄下
- 接著到後台 > 擴充套件管理 > 安裝 > 探索安裝 ，用探索的方式把元件安裝起來即可觀看。

## 用 git 查看

你可以用 git 來切換 tag 與 commit 以查看元件教學過程中的任何一個步驟。

但如果你希望 git 所切換的版本能夠反應到你安裝元件的 Joomla 上，我們需要進行以下步驟：

- 打開命令列，cd 到你複製下來的元件 git 目錄
- 執行 `$ php bin\makelink {你的Joomla目錄}`，例如 `$ php bin\makelink D:\www\joomla330`
- 這個 `makelink` 指令會在 Joomla 中建立符號捷徑 (Symbol link) 到你的 git 目錄
- 接下來，你對元件目錄中的任何 git 切換都可以反應到 Joomla 中了
- Windows 必須使用 Powershell.exe 來操作這個指令，並以管理員身分執行，請不要使用 cmd.exe （建議 Win7, Win8 環境）
- Mac 直接用終端機執行即可


