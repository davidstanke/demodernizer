FROM python:2.7

RUN pip install virtualenv
RUN virtualenv /opt/venv
RUN /opt/venv/bin/pip install Zope2 Paste DateTime==4.3
RUN /opt/venv/bin/mkwsgiinstance -d /opt/zope_instance -u admin:admin

# Expose port 3000
RUN sed -i 's/host = 127.0.0.1/host = 0.0.0.0/' /opt/zope_instance/etc/zope.ini && \
    sed -i 's/port = 8080/port = 3000/' /opt/zope_instance/etc/zope.ini

COPY index.html /opt/zope_instance/index.html
COPY init.py /opt/zope_instance/init.py

RUN /opt/venv/bin/zconsole run /opt/zope_instance/etc/zope.conf /opt/zope_instance/init.py

CMD ["/opt/venv/bin/runwsgi", "-v", "/opt/zope_instance/etc/zope.ini"]
