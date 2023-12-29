import hashlib
import os
import requests
import sys
from datetime import datetime

image_path = './'

def slug(string):
    word_list = string.split()  # split by space
    return "-".join(word_list)  # join by dash

def download_image(url, save_path):
    # try :
        # Create folder structure based on year, month, and day
        now = datetime.now()
        year = str(now.year)
        month = str(now.month).zfill(2)
        day = str(now.day).zfill(2)
        folder_path = os.path.join(save_path, year, month, day)
        print(folder_path)
#         sys.exit("Oy!")
        os.makedirs(folder_path, exist_ok=True)

        # Download image from URL
        response = requests.get(url)
        content = response.content

        # Generate MD5 hash of image content
        md5_hash = hashlib.md5(content).hexdigest()
        ext = url.split(".")
        image_format = ext[-1].split("?")[0]  # remove leading dot and convert to lowercase

        # Save image to file with MD5 hash name
        file_path = os.path.join(folder_path, md5_hash + '.' + image_format)
        file_path = file_path.encode('utf-8')
        with open(file_path, 'wb') as f:
            f.write(content)

        return md5_hash + "." + image_format
    # except :
    #     return False

def majalesalamatCallback(soup):
    items = []

    posts = soup.select("article.post")
    # print(posts)
    for post in posts:
        image = download_image(post.select_one(".wp-post-image")["src"],image_path)
        print(post.select_one(".wp-post-image")["src"])
        title = post.select_one(".content h2 a").text
        title_slug = slug(title)
        # print(title_slug)  # output: "hello-world"

        items.append({
            "title" : title,
            "description" : post.select_one(".excerpt p").text,
            "slug" : title_slug,
            "link" : post.select_one(".content h2 a")["href"],
            "media" : image if image else None,
            "category_id" : 1,
            "category_name" : "سلامت",

        })

    # extract data from HTML structure and append to items list
    # print(items)
    return items

def kojaroCallback(soup):
    items = []

    posts = soup.select(".LatestNews .newsbox")
    # print(posts)
    for post in posts:
        # print(post)
        image = download_image(post.select_one(".img-responsive")["src"],image_path)
        # print(post)
        title = post.select_one(".topicTitle a").text
        title_slug = slug(title)
        print(image)  # output: "hello-world"

        items.append({
            "title" : title,
            "description" : post.select_one(".hide-on-small-and-down").text,
            "slug" : title_slug,
            "link" : post.select_one(".topicTitle a")["href"],
            "media" : image if image else None,
            "category_id" : 2,
            "category_name" : "گردشگری",

        })

    # extract data from HTML structure and append to items list
    # print(items)
    return items



def khabarvarzeshiCallback(soup):
    items = []

    posts = soup.select(".cards ul li")
    # print(posts)
    for post in posts:
        # print(post)
        image = post.select_one("figure a img")
        if image is not None :
            image = download_image(image["src"],image_path)
        else :
            image = None
        # print(post)
        title = post.select_one(".desc h3 a").text
        title_slug = slug(title)
        print(image)  # output: "hello-world"

        items.append({
            "title" : title,
            "description" : post.select_one(".desc p").text,
            "slug" : title_slug,
            "link" : post.select_one(".desc h3 a")["href"],
            "media" : image if image else None,
            "category_id" : 3,
            "category_name" : "ورزشی",
        })

    # extract data from HTML structure and append to items list
    # print(items)
    return items


def cinematicketCallback(soup):
    items = []

    posts = soup.select(".bs-pagination-wrapper article")
    # print(posts)
    for post in posts:
        # print(post)
        image = download_image(post.select_one(".item-inner .featured a")["data-src"],image_path)
        # print(post)
        title = post.select_one(".title a").text
        title_slug = slug(title)
        print(image)  # output: "hello-world"

        items.append({
            "title" : title,
            "description" : post.select_one(".post-summary").text,
            "slug" : title_slug,
            "link" : post.select_one(".title a")["href"],
            "media" : image if image else None,
            "category_id" : 4,
            "category_name" : "سینما",
        })

    # extract data from HTML structure and append to items list
    # print(items)
    return items



def pedalCallback(soup):
    items = []

    posts = soup.select(".mag-box-container .posts-items > li")
    # print(posts)
    for post in posts:
        # print(post)
        image = None
        imageTag = post.select_one(".wp-post-image")
        if imageTag is not None :
            src = imageTag["src"]
            if not src.startswith("data:image") :
                image = download_image("https://www.pedal.ir/" + src,image_path)
            else :
                image = None

        # print(post)
        title = post.select_one(".post-title a").text
        title_slug = slug(title)
        print(src)  # output: "hello-world"

        items.append({
            "title" : title,
            "description" : post.select_one(".post-excerpt").text,
            "slug" : title_slug,
            "link" : "https://www.pedal.ir/" + post.select_one(".post-title a")["href"],
            "media" : image if image else None,
            "category_id" : 5,
            "category_name" : "خودرو",
        })

    # extract data from HTML structure and append to items list
    # print(items)
    return items


def bartarinhaCallback(soup):
    items = []

    posts = soup.select(".main_land_list > li")
    # print(posts)
    for post in posts:
        # print(post)
        image = download_image(post.select_one(".image_lead .image a img")["src"],image_path)
        # print(post)
        title = post.select_one(".title a").text
        title_slug = slug(title)


        items.append({
            "title" : title,
            "description" : post.select_one(".image_lead .lead").text,
            "slug" : title_slug,
            "link" : "https://www.bartarinha.ir/" + post.select_one(".title a")["href"],
            "media" : image if image else None,
            "category_id" : 3,
            "category_name" : "ورزشی",
        })

    # extract data from HTML structure and append to items list
    # print(items)
    return items

callbacks = {
    "majalesalamat":majalesalamatCallback,
    "kojaro":kojaroCallback,
    "khabarvarzeshi":khabarvarzeshiCallback,
    "cinematicket":cinematicketCallback,
    "pedal":pedalCallback,
    "bartarinha":bartarinhaCallback,
}

urls = {
    "majalesalamat":[
        'https://www.majalesalamat.com/nutrition/page/{}',
        'https://www.majalesalamat.com/fitness/page/{}',
        'https://www.majalesalamat.com/mental/page/{}',
        'https://www.majalesalamat.com/beauty/page/{}',
        'https://www.majalesalamat.com/lifestyle/page/{}'
    ],
    "kojaro":[
        'https://www.kojaro.com/page/{}',
    ],
    "khabarvarzeshi":[
        "https://www.khabarvarzeshi.com/service/allnews"
    ],
    "cinematicket":[
        "https://mag.cinematicket.org/category/news",
        "https://mag.cinematicket.org/category/articles/"
    ],
    "pedal":[
        "https://www.pedal.ir/",
    ],
    "bartarinha":[
        "https://www.bartarinha.ir/%D8%A8%D8%AE%D8%B4-%D8%A7%D8%AE%D8%A8%D8%A7%D8%B1-%D9%88%D8%B1%D8%B2%D8%B4%DB%8C-123"
    ]
}
