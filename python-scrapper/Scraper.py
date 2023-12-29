import requests
from bs4 import BeautifulSoup

class Scraper:
    def __init__(self, urls, callback,db):
        self.urls = urls
        self.callback = callback
        self.db = db
        self.cursor = self.db.cursor()

    def scrape(self):
        for url in self.urls:
            page = 1
            while page < 2:
                response = requests.get(url.format(page))
                soup = BeautifulSoup(response.content, 'html.parser')
                items = self.callback(soup)
                if not items:
                    break
                for item in items:
                    self.save_to_database(item)
                page += 1

    def save_to_database(self, item):
        sql = "INSERT INTO news (url, title, description,slug,category_id,category_name,media) VALUES (%s, %s, %s, %s,%s, %s, %s)"
        val = (item['link'],item['title'], item['description'], item['slug'], item['category_id'], item['category_name'], item['media'])
        self.cursor.execute(sql, val)
        self.db.commit()
