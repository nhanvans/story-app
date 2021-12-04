import requests
from bs4 import BeautifulSoup
import mysql.connector
import json
import time
import traceback

start_time = time.time()

with open('./config.json') as f:
	config = json.loads(f.read())
	f.close()

mysql_config = config['mysql']

mydb = mysql.connector.connect(
	host=mysql_config['host'],
	user=mysql_config['username'],
	passwd=mysql_config['password'],
	database=mysql_config['database']
)

mycursor = mydb.cursor()

def insert_chapter(cursor, data):
	sql_hero = "INSERT INTO `chapters` (`id`, `story_id`, `name`, `content`, `created_at`, `updated_at`) VALUES (NULL, %s, %s, %s, NULL, NULL)"
	cursor.execute(sql_hero, data)
	return cursor.lastrowid

def crawl_chapter_for_url(url_chapter, story_id):
    try:
        response = requests.get(url_chapter)
        soup = BeautifulSoup(response.content, "html.parser")

        title = soup.find("a", class_="chapter-title").getText()
        content = soup.find("div", class_="chapter-c")

        data_chapter = (str(story_id), title, str(content))

        # insert hero
        chapter_id = insert_chapter(mycursor, data_chapter)
        return chapter_id
    except Exception:
        print(traceback.format_exc())


def crawl_chapter(story_id, num_page, url_story):
    try:
        for page in range(1, num_page + 1):
            response = requests.get(url_story+"/trang-"+str(page)+"/#list-chapter")
            soup = BeautifulSoup(response.content, "html.parser")

            lists = soup.findAll("ul", class_="list-chapter")
            for list in lists:
                links = list.findAll("a")
                for link in links:
                    href = link['href']
                    crawl_chapter_for_url(href, story_id)
                    print(str(href))



    except Exception:
        print(traceback.format_exc())


crawl_chapter(16, 58, "https://truyenfull.vn/de-ton")

end_time = time.time()
total_time = end_time - start_time

mydb.commit()
print("total_time: " + str(total_time))
