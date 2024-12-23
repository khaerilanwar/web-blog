import urllib.request
import os

path_folder = 'public\\assets\\img\\blog'

iterable = 16

name_file = f'blog-{54}.jpg'
save_path = os.path.join(path_folder, name_file)
urllib.request.urlretrieve('https://picsum.photos/1024/768', save_path)
print(f"Saved {name_file}")

# while iterable < 200:
#     try:
#         name_file = f'blog-{iterable + 1}.jpg'
#         save_path = os.path.join(path_folder, name_file)
#         urllib.request.urlretrieve('https://picsum.photos/1024/768', save_path)
#         print(f"Saved {name_file}")

#         iterable += 1
#     except Exception as e:
#         continue
