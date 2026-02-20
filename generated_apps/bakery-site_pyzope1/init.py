import transaction
from Products.PageTemplates.ZopePageTemplate import manage_addPageTemplate

def init_zope():
    if hasattr(app, 'index_html'):
        app.manage_delObjects(['index_html'])
    with open('/opt/zope_instance/index.html', 'r') as f:
        html = f.read()
    manage_addPageTemplate(app, 'index_html', title='Bakery', text=html)
    transaction.commit()
    print "index_html added successfully."

init_zope()